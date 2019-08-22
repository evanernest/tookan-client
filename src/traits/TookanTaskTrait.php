<?php


namespace App\Tookan\Traits;


use Carbon\Carbon;

trait TookanTaskTrait {

    public function getTookanParameters()
    {
        return $this->getTookanPickupTaskParameters();

    }

    public function getTookanPickupTaskParameters()
    {
        return [
            "order_id" => "order-{$this->id}",
            "job_description" => "Task description",
            "job_pickup_phone" => $this->phone,
            "job_pickup_name" => $this->name,
            "job_pickup_email" => "",
            "job_pickup_address" => "114, sansome street, San Francisco",
            "job_pickup_latitude" => "30.7188978",
            "job_pickup_longitude" => "76.810296",
            "job_pickup_datetime" => "2019-08-21 19:00:00",
            "pickup_custom_field_template" => "Template_1",
            "pickup_meta_data" => "",
            "team_id" => "",
            "auto_assignment" => "0",
            "has_pickup" => "1",
            "has_delivery" => "0",
            "layout_type" => "0",
            "tracking_link" => 1,
            "timezone" => "-240",
            "fleet_id" => "374764",
            "p_ref_images" => "",
            "notify" => 1,
            "tags" => "",
            "geofence" => 0,


//            "job_pickup_phone" => ,
//            "job_pickup_name" => ,
//            "job_pickup_email" => $this->email,
//            "job_pickup_address" => $this->full_address,
//            "job_pickup_latitude" => $this->lat,
//            "job_pickup_longitude" => $this->long,
//            "job_pickup_datetime" => $this->calculatePickupDate(),
//
//            "pickup_custom_field_template" => "Template_1",
//            "pickup_meta_data" => "",
////            "team_id" => ""
//            // TODO make pickup and delivery auto from order type
//            "auto_assignment" => "0",
//            "has_pickup" => "1",
//            "has_delivery" => "0",
//            "layout_type" => "0",
//            "tracking_link" => 1,
//            "timezone" => "300",
//            "fleet_id" => "374764",
////            "p_ref_images" => [
////                "http=>//tookanapp.com/wp-content/uploads/2015/11/logo_dark.png"
////            ],
//            "notify" => 1,
//            "tags" => "",
//            "geofence" => 0

        ];
    }

    public function calculatePickupDate()
    {
        // Tookan API date format MM/DD/YYYY mm:ss
        $dateString = explode(' ', $this->perferred_day)[0] . ' ' . $this->perferred_time_from;
        $date = Carbon::parse($dateString)->format('m/d/Y h:i');
        return $date;
    }
}