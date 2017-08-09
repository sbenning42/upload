import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import { FormsModule } from '@angular/forms';

import { UploadService } from './services/upload.service';

import { AppComponent } from './app.component';
import { DropZoneComponent } from './components/drop-zone/drop-zone.component';

@NgModule({
  declarations: [
    AppComponent,
    DropZoneComponent
  ],
  imports: [
    BrowserModule,
    HttpModule,
    FormsModule
  ],
  providers: [
    UploadService,
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
