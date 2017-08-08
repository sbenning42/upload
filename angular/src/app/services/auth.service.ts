import { Injectable } from '@angular/core';
import { Router } from '@angular/router';

import { HttpService } from './http.service';
import { User } from '../models/user';

@Injectable()
export class AuthService {

  user: User;

  constructor(
    private http: HttpService,
    private router: Router
  ) { }

  login(user: User) {
    this.http.post('/login', user).subscribe(
      (data) => {
        localStorage.setItem('token', data.token);
        localStorage.setItem('user', data.user.id);
        this.router.navigate(['/home']);
      },
      (errors) => console.log(<any>errors)
    );
    return this.user;
  }
}
