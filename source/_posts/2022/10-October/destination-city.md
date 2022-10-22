---
extends: _layouts.post
section: content
title: Destination city
problemUrl: https://leetcode.com/problems/destination-city/
date: 2022-10-22
categories: [array-and-hashmap]
---

The destination city can not be seen as departure city. So, we will create a set with all departure cities. Then we iterate all destination cities and check if it is in the set. If not, we return it.

```python
class Solution:
    def destCity(self, paths: List[List[str]]) -> str:
        departures = set()
        for src, dest in paths:
            departures.add(src)
        for src, dest in paths:
            if dest not in departures:
                return dest
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`