<?
include_once 'Financiera.php';
include_once 'Cliente.php';
include_once 'Cuota.php';
include_once 'Prestamo.php';

function testSistemaFinanciera() {
    $financiera = new Financiera("Electrodomésticos Neuquen", "Av. Argentina 123");
    
    $cliente1 = new Cliente("Facundo", "Morales", "12345678", "Calle 1", "Facundo@email.com", "111-222-333", 100000);
    $cliente2 = new Cliente("Nahuel", "Rivas", "87654321", "Calle 2", "Nahuel@email.com", "444-555-666", 80000);
    
//NOLLEGOOOOOOASKDFJAKSDFJAKSD
}


testSistemaFinanciera();
