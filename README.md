# projectQ
#####Projekt systemu statystyk WWW dla gildii. Stworzony jako darmowa alternatywa dla twórców serwerów.

## Funkcje
- [x] Wyświetlanie rankingu "top" graczy i gildii.
- [x] Wyszukiwanie graczy i gildii.
- [x] Wyświetlanie szczegółowych informacji o graczach i gildiach.
- [x] Pokazanie dynamicznego statusu serwera (opcjonalnie).
- [x] Możliwość użycia wielu predefiniowanych motywów.
- [x] Kompatybilność wyświetlania dla urządzeń mobilnych.

## Wspierane pluginy
* OpenGuild (v. 0.6.5 +)
 
## Instalacja
1. Pobierz najnowszą wersję stabilną: **[projectQ-Stable.zip](https://github.com/SlimaKCoder/projectQ/archive/Stable.zip)**
2. Wypakuj pliki do głównego folderu lub podfolderu na serwerze WWW.
3. Główna konfiguraca projectQ jest w pliku **config/main.conf.php**.
4. W **config/mysql.conf.php** powinienieś wpisać dane do bazy MySQL.
5. Dodatkowo w pliku **config/status.conf.php** są ustawienia dynamicznego statusu serwera.
6. W razie problemów możesz włączyć debugowanie od PHP5 w głównej konfiguracji.

## Wymagania
* Serwer Minecraft z działającym pluginem OpenGuild.
* Serwer MySQL w wersji 5.x.
* Serwer WWW z PHP 5.x obsługujący MySQLi.
* Wygenerowana przez plugin baza MySQL.
* Użytkownik z hasłem dla bazy MySQL.

## Licencja
> #### Copyright &copy; 2014, SlimaK | Licensed under **[Creative Commons Attribution-NoDerivatives 4.0 International License](https://creativecommons.org/licenses/by-nd/4.0/legalcode)**
