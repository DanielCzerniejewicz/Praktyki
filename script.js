// Wymagania dotyczące skryptu:
// ‒ Napisany w języku JavaScript
// ‒ Należy stosować znaczące nazewnictwo wszystkich zmiennych i funkcji
// ‒ Realizuje transformacje obrazów. Przykładowe wyniki transformacji są umieszczone w tabeli 1.
// Tabela 3 specyfikuje wartości właściwości filter, którą należy zastosować w skryptach
// ‒ Transformacje obrazu 1:
// ‒ Gdy zaznaczono pole Blur na obraz jest nakładany filtr rozmycia o dowolnej wartości z przedziału
// 4 px ÷ 8 px
// ‒ Gdy zaznaczono pole Sepia na obraz nakładany jest filtr kolorów sepii (efekt starej fotografii)
// o wartości 100%
// ‒ Gdy zaznaczono pole Negatyw na obraz nakładany jest filtr odwrócenia kolorów (negatyw)
// w 100%
// ‒ Transformacje obrazu 2:
// ‒ Po wciśnięciu przycisku „Kolory” obraz ma zdjęty filtr odcieni szarości
// ‒ Po wciśnięciu przycisku „Czarno-biały” na obraz jest nakładany filtr odcieni szarości o wartości
// 100%
// ‒ Transformacje obrazu 3: Po wciśnięciu przycisku „Zastosuj” na obraz jest nakładany filtr
// przezroczystości o wartości, która została wskazana suwakiem
// ‒ Transformacje obrazu 4: Po wciśnięciu przycisku „Zastosuj” na obraz jest nakładany filtr zmiany
// jasności o wartości, która została wskazana suwakiem.

function Pszczola()
{
    let blur = document.getElementById("blur");
    let sepia = document.getElementById("sepia");
    let negatyw = document.getElementById("negatyw");
    let pszczola = document.getElementById("bydle");
    if(blur.checked)
    {
        pszczola.style.filter = "blur(5px)";
    }
    if(sepia.checked)
    {
        pszczola.style.filter = "sepia(100%)";
    }
    if(negatyw.checked)
    {
        pszczola.style.filter = "invert(100%)";
    }
}
function kolor_Pomarancze()
{
    let pomarancze = document.getElementById("pomarancze");
    pomarancze.style.filter = "none";
}
function czarnobiale_Pomarancze()
{
    let pomarancze = document.getElementById("pomarancze");
    pomarancze.style.filter = "grayscale(100%)";
}
function owoce()
{
    let obraz = document.getElementById("owoce");
    let suwak = document.getElementById("suwak_1").value;
    obraz.style.filter = `opacity(${suwak}%)`
}
function zolw()
{
    let obraz = document.getElementById("zolw");
    let suwak = document.getElementById("suwak_2").value;
    obraz.style.filter = `brightness(${suwak}%)`
}