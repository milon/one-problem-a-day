---
extends: _layouts.post
section: content
title: Encode number
problemUrl: https://leetcode.com/problems/encode-number/
date: 2022-12-16
categories: [array-and-hashmap]
---

The following sequence can be built up form the ealier result. So we can search index of the prefix part, for example:

f(5) = "10", f(6) = "11"

The prefix are both f(2) = "1"

so we found that f(n) has f((n - 1) / 2) as prefix.

```python
class Solution:
    def encode(self, num: int) -> str:
        return self.encode((num-1)//2) + '10'[num % 2] if num else ""
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(log(n))`