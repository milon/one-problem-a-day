---
extends: _layouts.post
section: content
title: Detect capital
problemUrl: https://leetcode.com/problems/detect-capital/
date: 2022-12-13
categories: [array-and-hashmap]
---

We can use python's built in fuction to check the conditions.

```python
class Solution:
    def detectCapitalUse(self, word: str) -> bool:
        return word.isupper() or word.islower() or word.istitle()
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`

