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
    this.isLoggued();
  }

  isLoggued() {
    const token = localStorage.getItem('token');
    this.loggued = token ? true : false;
    return this.loggued;
  }

}
