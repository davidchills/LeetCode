#!/usr/bin/env python3
import math
def TestPrime(InputInt):
	for DivFactor in range(2, int(math.sqrt(InputInt))+1):
		print(DivFactor)
		if InputInt % DivFactor == 0:
			print("Not Prime")
			return
			
	print("Prime")
	
TestPrime(18907111)