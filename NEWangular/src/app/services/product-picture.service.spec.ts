import { TestBed, inject } from '@angular/core/testing';

import { ProductPictureService } from './product-picture.service';

describe('ProductPictureService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ProductPictureService]
    });
  });

  it('should be created', inject([ProductPictureService], (service: ProductPictureService) => {
    expect(service).toBeTruthy();
  }));
});
