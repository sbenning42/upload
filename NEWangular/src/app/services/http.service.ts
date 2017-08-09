import { Injectable } from '@angular/core';

import { Http, Headers, RequestOptions } from '@angular/http';

import 'rxjs';
import { Observable } from 'rxjs';

@Injectable()
export class HttpService {

  prod = false;

  myUrl: string;

  myDevUrl = 'http://lara.dev/api';
  /* myDevUrl = 'http://laravelback.app/api'; */

  myProdUrl = 'http://preprod.authenticdesign.fr/api';

  headers: Headers;

  options: RequestOptions;

  constructor(
    private http: Http
  ) {
    this.myUrl = this.prod ? this.myProdUrl : this.myDevUrl;
  }

  hook() {
    this.headers = new Headers();
    this.headers.append('Content-Type', 'application/json');
    let token;
    if ( (token = localStorage.getItem('token')) ) {
      this.headers.append('Authorization', 'Bearer ' + token);
    }
    this.options  = new RequestOptions({ headers : this.headers });
    return this.options;
  }

  get(path): Observable<any> {
    return this.http.get(this.myUrl + path, this.hook()).map((response) => response.json());
  }

  post(path, data): Observable<any> {
    return this.http.post(this.myUrl + path, data, this.hook()).map((response) => response.json());
  }
}
