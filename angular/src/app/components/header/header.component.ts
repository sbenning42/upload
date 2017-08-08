import { Component, OnInit, Output, EventEmitter } from '@angular/core';

import {DomSanitizer} from '@angular/platform-browser';
import {MdIconRegistry} from '@angular/material';


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

  constructor(iconRegistry: MdIconRegistry, sanitizer: DomSanitizer) {
    /*iconRegistry.addSvgIcon(
        'home',
        sanitizer.bypassSecurityTrustResourceUrl('assets/img/home-icon.svg'));*/
  }

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
