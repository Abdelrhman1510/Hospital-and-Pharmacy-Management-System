<?php

namespace App\Livewire;
use App\Models\Group;
use App\Models\Service;
use Livewire\Component;
use Illuminate\Database\Eloquent\Model;




class CreateGroupServices extends Component
{
    public $GroupsItems = [];
    public $allServices = [];
    public $discount_value = 0;
    public $taxes = 17;
    public $name_group;
    public $notes;
    public $ServiceSaved = false;
    public $show_table =true;
    public $updateMode = false;
    public $group_id;
    public $ServiceUpdated =false;
    public $updateMode1 = false;
    public $ServiceDeleted = false;

    public function mount()
    {
        $this->allServices = Service::all();
    }

    public function render()
    {

        $total = 0;
        foreach ($this->GroupsItems as $groupItem) {
            if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                $total += $groupItem['service_price'] * $groupItem['quantity'];
            }
        }

        return view('livewire.GroupServices.create-group-services', [
            'groups'=> Group::all(),

            'subtotal' => $Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'total' => $Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100)
        ]);

    }


    public function addService()
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.' . $key, 'يجب حفظ هذا الخدمة قبل إنشاء خدمة جديدة.');
                return;
            }
        }

        $this->GroupsItems[] = [
            'service_id' => '',
            'quantity' => 1,
            'is_saved' => false,
            'service_name' => '',
            'service_price' => 0
        ];

        $this->ServiceSaved = false;
    }

    public function editService($index)
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.' . $key, 'This line must be saved before editing another.');
                return;
            }
        }

        $this->GroupsItems[$index]['is_saved'] = false;
    }


    public function saveService($index)
    {
        $this->resetErrorBag();
        $product = collect($this->allServices)->firstWhere('id', $this->GroupsItems[$index]['service_id']);

        if (!$product) {
            $this->addError('GroupsItems.' . $index, 'The selected service could not be found.');
            return;
        }

        $this->GroupsItems[$index]['service_name'] = $product['name'];
        $this->GroupsItems[$index]['service_price'] = $product['price'];
        $this->GroupsItems[$index]['is_saved'] = true;
    }

    public function removeService($index)
    {
        unset($this->GroupsItems[$index]);
        $this->GroupsItems = array_values($this->GroupsItems);
    }

    public function saveGroup()
    {
        if ($this->updateMode) {
            $Groups = Group::find($this->group_id);
            $total = 0;

            foreach ($this->GroupsItems as $groupItem) {
                if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                    // Calculate total before discount
                    $total += $groupItem['service_price'] * $groupItem['quantity'];
                }
            }

            // Update group totals
            $Groups->Total_before_discount = $total;
            $Groups->discount_value = $this->discount_value;
            $Groups->Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            $Groups->tax_rate = $this->taxes;
            $Groups->Total_with_tax = $Groups->Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
            $Groups->save();

            // Update translations
            $Groups->name = $this->name_group;
            $Groups->notes = $this->notes;
            $Groups->save();

            // Update pivot table relationships
            $Groups->service_group()->detach();
            foreach ($this->GroupsItems as $GroupsItem) {
                $Groups->service_group()->attach($GroupsItem['service_id'], ['quantity' => $GroupsItem['quantity']]);
            }

            $this->ServiceSaved = false;
            $this->ServiceUpdated = true;

        } else {
            $Groups = new Group();
            $total = 0;

            foreach ($this->GroupsItems as $groupItem) {
                if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                    // Calculate total before discount
                    $total += $groupItem['service_price'] * $groupItem['quantity'];
                }
            }

            // Save group totals
            $Groups->Total_before_discount = $total;
            $Groups->discount_value = $this->discount_value;
            $Groups->Total_after_discount = $total - ((is_numeric($this->discount_value) ? $this->discount_value : 0));
            $Groups->tax_rate = $this->taxes;
            $Groups->Total_with_tax = $Groups->Total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
            $Groups->save();

            // Save translations
            $Groups->name = $this->name_group;
            $Groups->notes = $this->notes;
            $Groups->save();

            // Attach services with quantity to the pivot table
            foreach ($this->GroupsItems as $GroupsItem) {
                $Groups->service_group()->attach($GroupsItem['service_id'], ['quantity' => $GroupsItem['quantity']]);
            }

            $this->reset('GroupsItems', 'name_group', 'notes');
            $this->discount_value = 0;
            $this->ServiceSaved = true;
        }
    }

    public function serviceSelected($index)
{
    // This method is triggered when a service is selected from the dropdown.
    $this->resetErrorBag();
    $product = collect($this->allServices)->firstWhere('id', $this->GroupsItems[$index]['service_id']);

    if ($product) {
        $this->GroupsItems[$index]['service_name'] = $product['name'];
        $this->GroupsItems[$index]['service_price'] = $product['price'];
    }
}


public function show_form_add(){

    $this->show_table = false;
}
public function edit($id)
{
    $this->show_table = false;
    $this->updateMode = true;
    $group = Group::with('service_group')->findOrFail($id);
    $this->group_id = $id;

    $this->reset('GroupsItems', 'name_group', 'notes');
    $this->name_group = $group->name;
    $this->notes = $group->notes;

    $this->discount_value = intval($group->discount_value);
    $this->ServiceSaved = false;

    foreach ($group->service_group as $serviceGroup) {
        $this->GroupsItems[] = [
            'service_id' => $serviceGroup->id,
            'quantity' => $serviceGroup->pivot->quantity, // Fetch quantity from the pivot table
            'is_saved' => true,
            'service_name' => $serviceGroup->name,
            'service_price' => $serviceGroup->price,
        ];
    }
}

public function delete($id)
{
    Group::destroy($id);

    session()->flash('success', trans('Dashboard/services.Data Deleted Successfully'));

    return redirect()->to('/Add_GroupServices');
}

}
