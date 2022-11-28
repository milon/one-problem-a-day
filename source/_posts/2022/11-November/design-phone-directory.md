---
extends: _layouts.post
section: content
title: Design phone directory
problemUrl: https://leetcode.com/problems/design-phone-directory/
date: 2022-11-28
categories: [design]
---

We will use a set to keep track of the available numbers. We will also use a queue to keep track of the numbers that have been released.

```python
class PhoneDirectory:
    def __init__(self, maxNumbers: int):
        self.available = set(range(maxNumbers))

    def get(self) -> int:
        return self.available.pop() if self.available else -1
        
    def check(self, number: int) -> bool:
        return number in self.available

    def release(self, number: int) -> None:
        self.available.add(number)

# Your PhoneDirectory object will be instantiated and called as such:
# obj = PhoneDirectory(maxNumbers)
# param_1 = obj.get()
# param_2 = obj.check(number)
# obj.release(number)
```

Time complexity: `O(1)` <br/>
Space complexity: `O(n)`, n is the maximum number of numbers in the phone directory