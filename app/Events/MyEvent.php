<?php
namespace App\Events;
use App\Models\Patient;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MyEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $patient_id;
  public $invoice_id;

  public function __construct($data)
  {
        dd($data);
    $patient = Patient::find($data['patient_id']);
    $this->patient_id = $patient->name;
    $this->invoice_id = $data['invoice_id'];

  }

  public function broadcastOn()
  {
      return ['my-channel'];
  }

  public function broadcastAs()
  {
      return 'my-event';
  }

} 
