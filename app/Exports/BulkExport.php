<?php
namespace App\Exports;
use Session;
use App\models\Order_list;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BulkExport implements FromCollection,WithHeadings,WithMapping,WithEvents
{
    
   

    public function headings(): array
    {
        return [
            'Invoice',
            'Event name',
            'Type',
            'Date',
            'Buyer',
            'Ticket Price',
            'Service Charge',
            'Discount',
            'Quantity',
            'Total',
            'Promo Code',
        ];
       
    }

   public function collection()
    {
        return Order_list::where('event_id',session()->get('event_id'))->
whereHas('order',function ($query)
 {
  $query->whereBetween('updated_at',[session()->get('from'),session()->get('to')]);
      })->get();  
    }



    public function map($order_list): array
    {


        if( $order_list->order->status == "1")
        {

              $status="sale";
        }elseif( $order_list->order->status == "2")
        {
             $status="Pending";
        } elseif( $order_list->order->status == "3"){
             $status="Return";
        }else{
             $status="Cancel";
        }
               
        

$ticket = ($order_list->ticket->face_price+$order_list->ticket->service_charge)*($order_list->quatity);
 $plus_tax = $ticket+$order_list->ticket->event_ticket->tax;
 $total = $plus_tax-$order_list->order->offer_amount;


        return [
             $order_list->id,
             $order_list->event->first_title .$order_list->event->second_title,

             $status,
             date("jS F, Y", strtotime($order_list->order->updated_at)),
             $order_list->buyer->first_name,
             $order_list->ticket->face_price,
              $order_list->ticket->service_charge,
               $order_list->ticket->event_ticket->tax,
                $order_list->order->offer_amount,
                 $order_list->quatity,
                 $total,
                 $order_list->order->promo_code,
                  
            
        ];
    }

     public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) 
            {
   
                $event->sheet->getDelegate()->getStyle('A1:L1')
                                ->getAlignment()
                                
                                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                        $event->sheet->getDelegate()->getStyle('A1:L1')
                                ->getFont()
                                ->setBold(true);

                               
                                



   
            },
              
        ];
    }

}
