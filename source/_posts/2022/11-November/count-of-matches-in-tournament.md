---
extends: _layouts.post
section: content
title: Count of matches in tournament
problemUrl: https://leetcode.com/problems/count-of-matches-in-tournament/
date: 2022-11-15
categories: [math-and-geometry]
---

We can simply count the number of matches played by counting the number of times we divide the number of teams by 2. We can also count the number of teams by counting the number of times we multiply the number of teams by 2.

```python
class Solution:
    def numberOfMatches(self, n: int) -> int:
        matches = 0
        while n > 1:
            matches += n // 2
            n = n // 2 + n % 2
        return matches
```

Time complexity: `O(log(n))` <br/>
Space complexity: `O(1)`

We can take another approach. For every match, one win and other loses and get eliminated. The champion never lose, n-1 other other team lose. So, the total number of matches played is n-1.

```python
class Solution:
    def numberOfMatches(self, n: int) -> int:
        return n-1
```

Time complexity: `O(1)` <br/>
Space complexity: `O(1)`