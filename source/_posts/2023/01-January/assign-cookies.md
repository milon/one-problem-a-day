---
extends: _layouts.post
section: content
title: Assign cookies
problemUrl: https://leetcode.com/problems/assign-cookies/
date: 2023-01-07
categories: [greedy]
---

We will sort both child and cookies. Then we will try to satisfy the child with the smallest greed factor. If the cookie is not enough, we will move to the next cookie. If the cookie is enough, we will move to the next child. If we have no more cookies, we will stop.

```python
class Solution:
    def findContentChildren(self, g: List[int], s: List[int]) -> int:
        g.sort()
        s.sort()
        
        child = 0
        for cookie in s:
            if cookie >= g[child]:
                child += 1
            if child == len(g):
                break
        
        return child
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`