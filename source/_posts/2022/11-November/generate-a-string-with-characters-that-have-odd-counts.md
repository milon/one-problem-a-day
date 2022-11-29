---
extends: _layouts.post
section: content
title: Generate a string with characters that have odd counts
problemUrl: https://leetcode.com/problems/generate-a-string-with-characters-that-have-odd-counts/
date: 2022-11-29
categories: [array-and-hashmap]
---

If n is odd, we will return a string with n 'a's. If n is even, we will return a string with n-1 'a's and one 'b'.

```python
class Solution:
    def generateTheString(self, n: int) -> str:
        return 'a'*(n-1) + 'b' if n % 2 == 0 else 'a'*n
```

Time complexity: `O(n)`, n is the number of characters in the string <br/>
Space complexity: `O(1)`