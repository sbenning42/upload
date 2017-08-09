import { Component, OnInit, Input } from '@angular/core';
import {DomSanitizer} from '@angular/platform-browser';

import {Observable} from 'rxjs';

import { User } from '../../../../models/user';
import { UserService } from '../../../../services/user.service';

import { Product } from '../../../../models/product';
import { ProductService } from '../../../../services/product.service';

import { UserPicture } from '../../../../models/user-picture';
import { UserPictureService } from '../../../../services/user-picture.service';


import { ProductPicture } from '../../../../models/product-picture';
import { ProductPictureService } from '../../../../services/product-picture.service';


@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {

  user: User = new User('', '', '', '', '', '', '', '', '', '');
  userPicture: UserPicture = new UserPicture('', '', '', '');
  productPicture: ProductPicture = new ProductPicture('', '', '', '');

  @Input() product: Product;
  constructor(
    private userService: UserService,
    private userPictureService: UserPictureService,
    private productPictureService: ProductPictureService
  ) {
  }

  ngOnInit() {
    console.log('product id: ' + this.product.id);
    this.userService.getUser(this.product.user_id).subscribe(
      (user) => {
        this.user = user;
        this.userPictureService.getMyPictures(user.id).subscribe(
          (picture) => {
            console.log(picture);
            this.userPicture = picture[0];
          },
          (errors) => console.log(<any>errors)
        );
      },
      (errors) => console.log(<any>errors)
    );
    this.productPictureService.getMyPictures(this.product.id).subscribe(
      <ProductPicture>(picture) => {
        console.log('Got Picture: ' + JSON.stringify(picture) + '\nfor product: ' + picture['product_id'] + '/' + this.product.id);
        this.productPicture['public_path'] = picture['public_path'];
      },
      (errors) => console.log(<any>errors)
    );
  }

}
