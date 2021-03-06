<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\City;
use App\Models\DaysWeek;
use App\Models\Delivery;
use App\Models\State;
use Livewire\Component;

use Livewire\WithFileUploads;

class DeliveryComponent extends Component
{
    use WithFileUploads;

    public $message_alert, $color_alert, $delivery, $user_id, $brand, $state_id, $city_id, $delivery_zone, $delivery_time, $delivery_free, $min_amount_purchase, $days_aux, $days_week, $newBrand;
    public $label_amount_delivery = '¿Cúal es el precio del delivery?';
    public $days = [];
    public $cities = [];
    public $openModal = false;
    public $openModalActualizar = false;
    public $status = 'active';
    public $perPage = 10;
    public $action = 'store';
    public $show_alert = 'false';

        public function render()
        {
            $brand = Brand::where('user_id', $this->user_id)->first();
            if( $brand ){
                $this->brand = $brand;
                $deliveries = Delivery::where('brand_id', $brand->id)->get();
            }else{
                $deliveries = '';
            }

            $estados = State::where('status', 'active')->get();
            $cities = City::where('state_id', '1')->get();
            $this->days_week = DaysWeek::all();
            $days_week = $this->days_week;
            return view('cms.tiendas.components.delivery-component', compact('deliveries', 'estados', 'brand', 'cities', 'days_week'));
        }

        // Funcion para buscar las ciudades, dependiendo del estado seleccionado
        public function changeState(){
            $this->cities = City::where('state_id', $this->state_id)->get();
        }

        public function agregar()
        {
            $this->reset(['show_alert']);
            //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
            $this->validate([
                'state_id' => 'required',
                'city_id' => 'required',
                'delivery_zone' => 'required',
                'days' => 'required',
                'delivery_time' => 'required',
                'delivery_free' => 'required',
                'min_amount_purchase' => 'required',
            ]);

            $brand = Brand::where('user_id', $this->user_id)->first();
            $brand_id = $brand->id;

            $this->days_aux = implode(',', $this->days);

            Delivery::create([
                'brand_id' => $brand_id,
                'state_id' => $this->state_id,
                'city_id' => $this->city_id,
                'delivery_zone' => $this->delivery_zone,
                'days' => $this->days_aux,
                'delivery_time' => $this->delivery_time,
                'delivery_free' => $this->delivery_free,
                'min_amount_purchase' => $this->min_amount_purchase
            ]);
            //reinicio las propiedades
            $this->reset(['city_id','delivery_zone','days','delivery_time','delivery_free','min_amount_purchase','show_alert','color_alert','message_alert','openModal']);
            $this->show_alert = 'true';
            $this->color_alert = 'green';
            $this->message_alert = 'Creada exitosamente!';
        }

        public function update(){
            $this->reset(['show_alert']);
            //en este caso se ignorara las reglas de validacion de $rules, y considerara las que se le asignan
            $this->validate([
                'state_id' => 'required',
                'city_id' => 'required',
                'delivery_zone' => 'required',
                'days' => 'required',
                'delivery_time' => 'required',
                'delivery_free' => 'required',
                'min_amount_purchase' => 'required',
            ]);

            $brand = Brand::where('user_id', $this->user_id)->first();
            $brand_id = $brand->id;

            $this->days_aux = implode(',', $this->days);

            $this->delivery->update([
                'brand_id' => $brand_id,
                'state_id' => $this->state_id,
                'city_id' => $this->city_id,
                'delivery_zone' => $this->delivery_zone,
                'days' => $this->days_aux,
                'delivery_time' => $this->delivery_time,
                'delivery_free' => $this->delivery_free,
                'min_amount_purchase' => $this->min_amount_purchase
            ]);
            //reinicio las propiedades
            $this->reset(['city_id','delivery_zone','days', 'days_aux','delivery_time','delivery_free','min_amount_purchase','show_alert','color_alert','message_alert','openModal','openModalActualizar']);
            $this->show_alert = 'true';
            $this->color_alert = 'green';
            $this->message_alert = 'Actualizada exitosamente!';
        }

        // Funcion que se activa al momento de dar click en el boton 'editar' de algun delivery
        public function buttonActualizarDelivery($id_delivery){
            $this->reset(['show_alert']);
            $this->openModalActualizar = true;
            $this->text = $id_delivery;
            $this->delivery = Delivery::where('id', $id_delivery)->first();

            $this->state_id = $this->delivery->state_id;
            $this->city_id = $this->delivery->city_id;
            $this->delivery_zone = $this->delivery->delivery_zone;
            $days = $this->delivery->days;
            $this->days = explode(',',$days);
            $this->delivery_time = $this->delivery->delivery_time;
            $this->delivery_free = $this->delivery->delivery_free;
            if ( $this->delivery_free == 0 ) {
                $this->label_amount_delivery = '¿Cúal es el precio del delivery?';
            }else{
                $this->label_amount_delivery = '¿Cúal es el monto minimo para hacer delivery?';
            }
            $this->min_amount_purchase = $this->delivery->min_amount_purchase;
        }

        public function cancelar(){
            $this->reset(['city_id','delivery_zone','days','delivery_time','delivery_free','min_amount_purchase','show_alert','color_alert','message_alert','openModalActualizar']);
        }

        public function destroy(Delivery $delivery)
        {
            $delivery->delete();
            //reinicio las propiedades
            $this->reset(['city_id','delivery_zone','days','delivery_time','delivery_free','min_amount_purchase','show_alert','color_alert','message_alert','openModalActualizar']);
            $this->show_alert = 'true';
            $this->color_alert = 'red';
            $this->message_alert = 'Eliminada exitosamente!';
        }

        // Funcion para cambiar el texto del label de monto de delivaery, en los modales
        public function setLabelAmountDelivery(){
            if ( $this->delivery_free == 0 ) {
                $this->label_amount_delivery = '¿Cúal es el precio del delivery?';
            }else{
                $this->label_amount_delivery = '¿Cúal es el monto minimo para hacer delivery?';
            }
        }

        // Evento que escucha se ejecuta cuando se crea la marca, desde el controlador 'BrandComponent'
        protected $listeners = ['newBrand'];

        public function newBrand($new)
        {
            $this->newBrand = $new;
        }

}

