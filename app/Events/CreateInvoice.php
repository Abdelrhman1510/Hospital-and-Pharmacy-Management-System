<?php
namespace App\Events;

use App\Models\Patient;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateInvoice implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $patient;
    public $doctor_id;

    public $invoice_id;
    public $message;
    public $created_at;

    /**
     * Create a new event instance.
     */
    public function __construct($data)
    {
        $patient = Patient::find($data['patient']);
        $this->patient = $patient->name;
        $this->doctor_id = $data['doctor_id'];

        $this->invoice_id = $data['invoice_id'];
        $this->message = "New Examination: ";
        $this->created_at =date('Y-m-d H:i:s');
    }


       public function broadcastOn()
    {
        return new PrivateChannel('create-invoice.'.$this->doctor_id);
        // return ['create-invoice'];
    }
    public function broadcastAs()
    {
        return 'create-event';
    }
}
