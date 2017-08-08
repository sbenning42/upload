import { Injectable } from '@angular/core';

import { HttpService } from './http.service';

import {Observable} from 'rxjs';

import { Product } from '../models/product';

@Injectable()
export class ProductService {

  constructor(
    private http: HttpService
  ) { }

  getProducts(): Observable<Product[]> {
    return this.http.get('/products');
  }

  getMyProducts(id): Observable<Product[]> {
    return this.getProducts().filter((products, i) => products[i].user_id === id);
  }

}
