import { Injectable } from '@angular/core';

import { Http, Headers } from '@angular/http';

import 'rxjs';
import { Observable } from 'rxjs';

@Injectable()
export class HttpService {

  myUrl = 'http://lara.dev/api';
  headers = new Headers();

  constructor(
    private http: Http
  ) { }

  get(path): Observable<any> {
    return this.http.get(this.myUrl + path, {headers : this.headers}).map((response) => response.json());
  }
}
