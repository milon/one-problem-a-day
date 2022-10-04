---
extends: _layouts.post
section: content
title: Palindrome number
problemUrl: https://leetcode.com/problems/palindrome-number/
date: 2022-10-04
categories: [math-and-geometry]
---

We can convert the number to string, reverse it and then check whether it's palindrome of not.

```python
class Solution:
    def isPalindrome(self, x: int) -> bool:
        x = str(x)
        return x == x[::-1]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`

First of all it the number is negative or the last digit of the number is 0, then it can't be a palindrome. Then we start from the end digit, creating a new number from that. If the new number is equal to the original number, then we return true, else false.

```python
class Solution:
    def isPalindrome(self, x: int) -> bool:
        if x < 0 or (x > 0 and x%10 == 0):
            return False
	
        result = 0
        while x > result:
            result = result * 10 + x % 10
            x = x // 10

        return x == result or x == result//10
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`