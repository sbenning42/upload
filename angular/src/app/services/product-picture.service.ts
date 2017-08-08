import { Injectable } from '@angular/core';

import { Http } from '@angular/http';

import 'rxjs';
import { Observable } from 'rxjs/Observable';

import { HttpService } from './http.service';

import { ProductPicture } from '../models/product-picture';

@Injectable()
export class ProductPictureService {

  constructor(
    private http: HttpService
  ) { }

  getPictures(): Observable<ProductPicture[]> {
    return this.http.get('/product/pictures');
  }

  getMyPictures(article_id): Observable<ProductPicture[]> {
    return this.getPictures().filter((pictures: ProductPicture[], id) => pictures[id].product_id === article_id);
  }

  getPicture(id): Observable<ProductPicture> {
    return this.http.get('/product/pictures/' + id).catch(
      (error:any) => Observable.throw(error || { message : "Server Error" }));
  }

}

