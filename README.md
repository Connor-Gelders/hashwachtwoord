# Login- en Registratiesysteem

Dit project bevat een login- en registratiesysteem waarbij gebruikersgegevens worden opgeslagen in een JSON-bestand in plaats van een database. Het systeem maakt gebruik van veilige wachtwoordopslag door middel van hashing.

## Installatie
1. Installeer een webserveromgeving zoals XAMPP of WAMP.
2. Start Apache via het Control Panel.
3. Zorg ervoor dat de bestanden `register.php`, `login.php`, `dashboard.php`, `logout.php`, en `styles.css` correct zijn geïmplementeerd.
4. Zorg ervoor dat het JSON-bestand `users_data.json` zich in dezelfde directory bevindt als de PHP-bestanden en dat het schrijfbaar is door de webserver.

## Functionaliteiten
- **Registratie**: Gebruikers kunnen een nieuw account aanmaken. E-mailadressen worden gecontroleerd op duplicaten.
- **Login**: Gebruikers kunnen inloggen met hun geregistreerde e-mailadres en wachtwoord.
- **Dashboard**: Na succesvolle login wordt een dashboard weergegeven met een welkomsbericht en een link om uit te loggen.
- **Uitloggen**: Gebruikers kunnen zich veilig afmelden via de `logout.php`-pagina.
- **Fireworks**: Het dashboard bevat een inline SVG-animatie van vuurwerk.

## Bestandsstructuur
```
project-root/
├── register.php       # Registratiepagina
├── login.php          # Loginpagina
├── dashboard.php      # Dashboard na login
├── logout.php         # Uitlogpagina
├── styles.css         # Stijlen voor de pagina's
├── users_data.json    # JSON-bestand voor gebruikersgegevens
```

## Aanpassingen
- Het gebruik van een database is vervangen door een JSON-bestand (`users_data.json`).
- Een animatie van vuurwerk (inline SVG) is toegevoegd aan het dashboard.
- CSS is bijgewerkt voor een consistente look, inclusief een vaste container en nette links.

## Vereisten
- PHP 7.4 of hoger
- Schrijftoegang voor `users_data.json` in de webserveromgeving

## Veiligheid
- Wachtwoorden worden opgeslagen met `password_hash()` voor veilige opslag.
- Validatie is ingebouwd om invoervelden te controleren op lege waarden en om te zorgen dat wachtwoorden overeenkomen tijdens registratie.
