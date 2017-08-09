import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import 'rxjs';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class UploadService {

  constructor(
    private http: Http
  ) { }

  uploadFile(url: string, file: File): Observable<any> {
    return this.http.post(url, {mfile : file, fileName : file.name}).map((response: Response) => response.json());
  }
}
