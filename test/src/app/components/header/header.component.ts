import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  @Output() sidenavEvent = new EventEmitter();
  @Output() userPageEvent = new EventEmitter();
  @Output() contactPageEvent = new EventEmitter();
  @Output() homeEvent = new EventEmitter();

  constructor() { }

  ngOnInit() {
  }

  sidenavEventEmit() {
    this.sidenavEvent.emit();
  }

  userPageEventEmit() {
    this.userPageEvent.emit();
  }

  contactPageEventEmit() {
    this.contactPageEvent.emit();
  }

  homeEventEmit() {
    this.homeEvent.emit();
  }

}
