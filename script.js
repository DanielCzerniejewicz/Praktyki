function Wyslij()
{
    // Inputy
    let i_imie = document.getElementById("i_imie").value;
    let i_nazwisko = document.getElementById("i_nazwisko").value;
    let i_email = document.getElementById("i_email").value;
    let selekcik = document.getElementById("selekcik").value;
    // Pobierane do wypisania
    let imie = document.getElementById("imie");
    let nazwisko = document.getElementById("nazwisko");
    let email = document.getElementById("email");
    let usluga = document.getElementById("usluga");
    //Wypisywanie tego
    imie.innerHTML = `${i_imie}`;
    nazwisko.innerHTML = `${i_nazwisko}`;
    email.innerHTML = `${i_email}`;
    usluga.innerHTML = `${selekcik}`;
}