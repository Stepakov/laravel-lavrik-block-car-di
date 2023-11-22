<x-form-select name="brand_id" label="Brand" :options="$brands" placeholder="Выберите Марку автомобиля" />
<x-form-input name="model" label="Model" />
<x-form-input type="number" name="price" label="Price" />
<x-form-select name="transmission" label="Transmission" :options="$transmissions" placeholder="Выберите коробку передачь" />
<x-form-input name="vin" label="Vin-номер" />
<x-form-select multiple name="tags[]" label="Tags" :options="$tags" placeholder="Выберите тэги" many-relation />
