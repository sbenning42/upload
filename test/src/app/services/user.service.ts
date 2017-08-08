import { Injectable } from '@angular/core';

import { HttpService } from './http.service';

import {Observable} from 'rxjs';

import { User } from '../models/user';

@Injectable()
export class UserService {

  constructor(
    private http: HttpService
  ) { }

  getUsers(): Observable<User[]> {
    return this.http.get('/users');
  }

}
