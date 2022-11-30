---
extends: _layouts.post
section: content
title: Fizz buzz
problemUrl: https://leetcode.com/problems/fizz-buzz/
date: 2022-11-30
categories: [array-and-hashmap]
---

We will iterate over the numbers from 1 to n and append the corresponding string to the result list. If the number is divisible by 3, we will append "Fizz" to the result list. If the number is divisible by 5, we will append "Buzz" to the result list. If the number is divisible by both 3 and 5, we will append "FizzBuzz" to the result list. If the number is not divisible by 3 or 5, we will append the number to the result list.

```python
class Solution:
    def fizzBuzz(self, n: int) -> List[str]:
        res = []
        for i in range(1, n+1):
            if i % (3*5) == 0:
                res.append("FizzBuzz")
            elif i % 3 == 0:
                res.append("Fizz")
            elif i % 5 == 0:
                res.append("Buzz")
            else:
                res.append(str(i))
        return res
```

Time complexity: `O(n)`, n is the number <br/>
Space complexity: `O(1)`