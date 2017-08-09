import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { MdToolbarModule } from '@angular/material';
import { MdSidenavModule } from '@angular/material';
import { MdListModule } from '@angular/material';
import { MdInputModule } from '@angular/material';
import { MdButtonModule } from '@angular/material';
import { MdCardModule } from '@angular/material';
import { MdIconModule } from '@angular/material';
import { DomSanitizer } from '@angular/platform-browser';
import { MdIconRegistry } from '@angular/material';

import { HttpModule } from '@angular/http';
import {routes} from './app.routes';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { NgModule } from '@angular/core';

import 'hammerjs';
import {Observable} from 'rxjs';

import { AuthService } from './services/auth.service';
import { UserService } from './services/user.service';
import { UserPictureService } from './services/user-picture.service';
import { ProductPictureService } from './services/product-picture.service';
import { ProductService } from './services/product.service';
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
import { LoginComponent } from './components/login/login.component';
import { ProductListComponent } from './components/user-gallery/product-list/product-list.component';
import { ProductComponent } from './components/user-gallery/product-list/product/product.component';
import { HomePageComponent } from './components/body/home-page/home-page.component';

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
    LoginComponent,
    ProductListComponent,
    ProductComponent,
    HomePageComponent,
  ],
  imports: [
    routes,
    BrowserModule,
    BrowserAnimationsModule,
    MdToolbarModule,
    MdSidenavModule,
    MdListModule,
    MdInputModule,
    MdButtonModule,
    MdCardModule,
    MdIconModule,
    HttpModule,
    FormsModule,
    ReactiveFormsModule,
  ],
  providers: [
    HttpService,
    AuthService,
    UserService,
    ProductService,
    MdIconRegistry,
    UserPictureService,
    ProductPictureService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
