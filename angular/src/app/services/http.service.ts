import { Injectable } from '@angular/core';

import { Http, Headers, RequestOptions } from '@angular/http';

import 'rxjs';
import { Observable } from 'rxjs';

@Injectable()
export class HttpService {

  prod = false;

  myUrl: string;

  myDevUrl = 'http://laravelback.app/api';

  myProdUrl = 'http://preprod.authenticdesign.fr/api';

  headers = new Headers();

  options: RequestOptions;

  constructor(
    private http: Http
  ) {
    this.myUrl = this.prod ? this.myProdUrl : this.myDevUrl;
    this.headers.append('Content-Type', 'application/json');
    let token;
    if ( (token = localStorage.getItem('token')) ) {
      this.headers.append('Authorization', 'Bearer ' + token);
    }
    this.options  = new RequestOptions({ headers : this.headers });
  }

  get(path): Observable<any> {
    return this.http.get(this.myUrl + path, this.options).map((response) => response.json());
  }

  post(path, data): Observable<any> {
    return this.http.post(this.myUrl + path, data, this.options).map((response) => response.json());
  }
}