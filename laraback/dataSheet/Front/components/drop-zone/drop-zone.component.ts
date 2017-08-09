import { Component, OnInit } from '@angular/core';
import { UploadService } from '../../services/upload.service';

@Component({
  selector: 'app-drop-zone',
  templateUrl: './drop-zone.component.html',
  styleUrls: ['./drop-zone.component.css']
})
export class DropZoneComponent implements OnInit {

  url: string = 'http://authentication.dev/api/upload';

  message: string;
  status: number;
  _fileName: string;
  fileName: string;
  file: File;
  isFile: Boolean;

  constructor(
    private uploadService: UploadService
  ) { }

  ngOnInit() {
    this.file = null;
    this.fileName = '';
    this._fileName = '';
    this.isFile = false;
    this.status = 0;
    this.message = '';
  }

  selectFile(event) {
    this.file = event.target.files[0];
    if (this.file) {
      this.isFile = true;
      this.fileName = this.file.name;
      this._fileName = this.file.name;
    } else {
      this.isFile = false;
      this.fileName = '';
      this._fileName = '';
    }
  }

  upload() {
    this.uploadService.uploadFile(this.url, this.file).subscribe(
      (response) => {
        this.message = response['message'];
        this.status = response['status'];
        console.log("Success: uploadFile(): message: " + this.message + '\nFile: ' + response['file'] + '\nfileName: ' + response['fileName'] + '\ndebug: ' + response['debug']);
      },
      (errors) => {
        console.log("Error: uploadFile(): " + <any>errors);
      }
    );
  }
}
