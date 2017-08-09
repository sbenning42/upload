import { Injectable, Output, EventEmitter } from '@angular/core';
import { Router } from '@angular/router';

import { HttpService } from './http.service';
import { User } from '../models/user';

@Injectable()
export class AuthService {

  constructor(
    private http: HttpService,
    private router: Router
  ) { }

  login(user: User) {
    return this.http.post('/login', user);
  }
}
