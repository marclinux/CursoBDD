#language: es
Característica: Categorias
  En orden para permitir administras las categorias
  Como un usuario administrador
  Yo necesito dar de alta, modificar y eliminar categorias

  Escenario: Agregar una categoria
  Dado que estoy en la pagina de crear categoria
  Y capturo "C001" en el dato de la clave
  Y capturo "CARNES" en el dato de la descripcion
  Y selecciono "--sin categoria padre" en el dato de categoria padre
  Cuando doy click en "Save"
  Entonces debo tener una categoria con los dato de "C001" en la clave, "CARNES" en la descripcion y "0" en la categoria padre

  Escenario: Modificar una categoria
  Dado que estoy en la pagina de modificar categoria con el id "1000"
  Y capturo "C002" en el dato de la clave
  Y capturo "SOPAS" en el dato de la descripcion
  Y selecciono "--sin categoria padre" en el dato de categoria padre
  Cuando doy click en "Save"
  Entonces debo tener los datos de "C002" en la clave, "SOPAS" en la descripcion de la categoria con id "1000"

  Escenario: Eliminar una categoria
  Dado que estoy en la pagina de mostrar categorias
  Cuando doy click en el icono de eliminar de la categoria con id "1001"
  Y confirmo eliminar el registro
  Entonces la categoria con clave "C01001" yo no debe existir
