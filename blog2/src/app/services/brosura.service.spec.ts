import { TestBed } from '@angular/core/testing';

import { BrosuraService } from './brosura.service';

describe('BrosuraService', () => {
  let service: BrosuraService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(BrosuraService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
