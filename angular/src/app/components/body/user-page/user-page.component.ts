import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-user-page',
  templateUrl: './user-page.component.html',
  styleUrls: ['./user-page.component.css']
})
export class UserPageComponent implements OnInit {

  token: string;
  loggued: boolean;

  constructor() { }

  ngOnInit() {
    this.token = localStorage.getItem('token');
    this.loggued = this.isLoggued();
  }

  isLoggued() {
    return this.loggued = this.token ? true : false;
  }

}
