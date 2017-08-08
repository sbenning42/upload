import { Component, OnInit } from '@angular/core';

import {Observable} from 'rxjs';

import { User } from '../../../models/user';
import { UserService } from '../../../services/user.service';

import { Product } from '../../../models/product';
import { ProductService } from '../../../services/product.service';

@Component({
  selector: 'app-product-list',
  templateUrl: './product-list.component.html',
  styleUrls: ['./product-list.component.css']
})
export class ProductListComponent implements OnInit {

  users: Observable<User[]>;
  products: Observable<Product[]>;
  constructor(
    private productService: ProductService,
    private userService: UserService,
  ) { }

  ngOnInit() {
    let me = localStorage.getItem('user');
    this.users = this.userService.getUsers();
    this.products = this.productService.getMyProducts(me);
  }

}
