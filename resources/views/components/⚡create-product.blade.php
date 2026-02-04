<?php

use Livewire\Component;
use App\Models\Product;

new class extends Component
{
    public $name;
    public $price;
    public $description;

    public $rules = [
        "name" => "required",
        "price" => "required",
        "description" => "required"
    ];
    
    public function save(){
        $this->validate();

        Product::create([
            "name" => $this->name,
            "price" => $this->price,
            "description" => $this->description
        ]); 
    }
};
?>

<div>
    <form wire:submit="save">
        <input type="text" name="name">
        @error("name")
            <span>{{ $message }}</span>
        @enderror
        <input type="number" name="price">
        @error("price")
            <span>{{ $message }}</span>
        @enderror
        <input type="text" name="description">
        @error("description")
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">submit</button>
    </form>
</div>