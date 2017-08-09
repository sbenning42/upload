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

  getMyProducts(): Observable<Product[]> {
    return this.http.get('/myproducts');
  }

}
