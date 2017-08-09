import { Routes, RouterModule } from "@angular/router";
import { ModuleWithProviders } from "@angular/core";

import { BodyComponent } from './components/body/body.component';

const appRoutes: Routes = [
  { path: '', redirectTo:'/home', pathMatch: 'full'},
  { path: 'home', component: BodyComponent},
];

export const routes:ModuleWithProviders = RouterModule.forRoot(appRoutes);