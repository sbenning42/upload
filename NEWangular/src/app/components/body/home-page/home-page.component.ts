import { Component, OnInit } from '@angular/core';
import { Sort } from '@angular/material';


@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent {
  suites = [
    {name: "Logo dans l'annuaire",                                      partners: 'yes', sponsors: 'yes', angels: 'yes'},
    {name: "Création d'annonces",                                       partners: 'yes', sponsors: 'yes', angels: 'yes'},
    {name: 'Partage du stock en B2B',                                   partners: 'yes', sponsors: 'yes', angels: 'yes'},
    {name: 'email dédié > mon.nom@authenticdesign.fr',                  partners: 'yes', sponsors: 'yes', angels: 'yes'},
    {name: 'Mise en relation B2B',                                      partners: 'yes', sponsors: 'yes', angels: 'yes'},
    {name: 'Traitement des images, textes, etc...',                     partners: 'no', sponsors: 'yes', angels: 'yes'},
    {name: 'Recherche documentaire',                                    partners: 'no', sponsors: 'yes', angels: 'yes'},
    {name: 'Envoi vers les Marketplaces B2C',                           partners: 'no', sponsors: 'yes', angels: 'yes'},
    {name: 'Marketing & Newsletters* (1/mois)',                         partners: 'no', sponsors: 'no', angels: 'yes'},
    {name: 'Marketing & Newsletters* (1/mois - 5 photos max)',          partners: 'no', sponsors: 'no', angels: 'yes'},
    {name: 'Rédaction de contenu thématique additionel (3 art./trim)',  partners: 'no', sponsors: 'no', angels: 'yes'},
    {name: 'Service Photo (1/2 journée)',                               partners: 'no', sponsors: 'no', angels: 'yes'},
  ];

  sortedData;

  //  constructor() { }
  //  ngOnInit() {  }

  constructor() {
    this.sortedData = this.suites.slice();
  }

/**  sortData(sort: Sort) {
    const data = this.suites.slice();
    if (!sort.active || sort.direction == '') {
      this.sortedData = data;
      return;
    }

    this.sortedData = data.sort((a, b) => {
      let isAsc = sort.direction == 'asc';
      switch (sort.active) {
        case 'name': return compare(a.name, b.name, isAsc);
        case 'partners': return compare(+a.partners, +b.partners, isAsc);
        case 'sponsors': return compare(+a.sponsors, +b.sponsors, isAsc);
        case 'angels': return compare(+a.angels, +b.angels, isAsc);
        default: return 0;
      }
    });
  }
}

  function compare(a, b, isAsc) {
    return (a < b ? -1 : 1) * (isAsc ? 1 : -1);
  }
*/

}