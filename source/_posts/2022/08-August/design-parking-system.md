---
extends: _layouts.post
section: content
title: Design parking system
problemUrl: https://leetcode.com/problems/design-parking-system/
date: 2022-08-19
categories: [array-and-hashmap, design]
---

We will create a hashmap, with the capacity. Each time, we add a car, we decrease the capacity by 1. If the capacity is already filled up, we return false, otherwise return true.

```python
class ParkingSystem:
    def __init__(self, big: int, medium: int, small: int):
        self.capacity = {1:big, 2: medium, 3: small}

    def addCar(self, carType: int) -> bool:
        if self.capacity[carType] > 0:
            self.capacity[carType] -= 1
            return True
        return False

# Your ParkingSystem object will be instantiated and called as such:
# obj = ParkingSystem(big, medium, small)
# param_1 = obj.addCar(carType)
```

Time Complexity: `O(1)`, for each operation. <br/>
Space Complexity: `O(1)`