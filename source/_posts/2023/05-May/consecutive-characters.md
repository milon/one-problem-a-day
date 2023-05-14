---
extends: _layouts.post
section: content
title: Consecutive characters
problemUrl: https://leetcode.com/problems/consecutive-characters/
date: 2023-05-14
categories: [array-and-hashmap]
---

We will keep track of the consecutive characters in a variable `count`. We will iterate over the string and if the current character is same as the previous character, we will increment the `count` variable. Otherwise, we will reset the `count` variable to 1. We will update the `max_count` variable with the maximum of `max_count` and `count`.

```python
class Solution:
    def maxPower(self, s: str) -> int:
        max_count, count = 1, 1
        for i in range(1, len(s)):
            if s[i] == s[i - 1]:
                count += 1
            else:
                count = 1
            max_count = max(max_count, count)
        return max_count
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`