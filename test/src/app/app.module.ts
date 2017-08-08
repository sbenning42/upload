import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { MdToolbarModule } from '@angular/material';
import { MdSidenavModule } from '@angular/material';
import { MdListModule } from '@angular/material';

import { HttpModule } from '@angular/http';

import { NgModule } from '@angular/core';

import 'hammerjs';
import {Observable} from 'rxjs';

import { UserService } from './services/user.service';
import { HttpService } from './services/http.service';


import { AppComponent } from './app.component';
import { UserGalleryComponent } from './components/user-gallery/user-gallery.component';
import { UserListComponent } from './components/user-gallery/user-list/user-list.component';
import { UserComponent } from './components/user-gallery/user-list/user/user.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { BodyComponent } from './components/body/body.component';
import { UserPageComponent } from './components/body/user-page/user-page.component';
import { ContactPageComponent } from './components/body/contact-page/contact-page.component';

@NgModule({
  declarations: [
    AppComponent,
    UserGalleryComponent,
    UserListComponent,
    UserComponent,
    HeaderComponent,
    FooterComponent,
    BodyComponent,
    UserPageComponent,
    ContactPageComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MdToolbarModule,
    MdSidenavModule,
    MdListModule,
    HttpModule,
  ],
  providers: [
    HttpService,
    UserService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
