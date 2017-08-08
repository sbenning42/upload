import { Injectable } from '@angular/core';

import { Http } from '@angular/http';

import 'rxjs';
import { Observable } from 'rxjs/Observable';

import { HttpService } from './http.service';

import { UserPicture } from '../models/user-picture';

@Injectable()
export class UserPictureService {

  constructor(
    private http: HttpService
  ) { }

  getPictures(): Observable<UserPicture[]> {
    return this.http.get('/user/pictures');
  }

  getMyPictures(user_id): Observable<UserPicture[]> {
    return this.getPictures().filter((pictures, id) => pictures[id].user_id === user_id);
  }

  getPicture(id): Observable<UserPicture> {
    return this.http.get('/user/pictures/' + id).catch(
      (error:any) => Observable.throw(error || { message : "Server Error" }));
  }

}
