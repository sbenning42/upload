import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-body',
  templateUrl: './body.component.html',
  styleUrls: ['./body.component.css']
})
export class BodyComponent implements OnInit {

  userPageFlag: boolean;
  contactPageFlag: boolean;

  constructor() { }

  ngOnInit() {
    this.hideUserPage();
    this.hideContactPage();
  }

  showUserPage() {
    this.userPageFlag = true;
  }

  showContactPage() {
    this.contactPageFlag = true;
  }

  hideUserPage() {
    this.userPageFlag = false;
  }

  hideContactPage() {
    this.contactPageFlag = false;
  }

  homePage() {
    this.hideContactPage();
    this.hideUserPage();
  }

  userPage() {
    this.hideContactPage();
    this.showUserPage();
  }

  contactPage() {
    this.showContactPage();
    this.hideUserPage();
  }

}
