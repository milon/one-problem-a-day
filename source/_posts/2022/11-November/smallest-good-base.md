---
extends: _layouts.post
section: content
title: Smallest good base
problemUrl: https://leetcode.com/problems/smallest-good-base/
date: 2022-11-03
categories: [math-and-geometry]
---

First we will convert the string to a integer. Then we calculate the maximum number of digits that the base can have. We will iterate from the maximum number of digits to 2. For each number of digits, we will calculate the base. If the base is a valid base, we will return it. If not, we will continue to the next number of digits. If we can't find a valid base, we will subtract 1 from the number n and return that as a result.

```java

```python
class Solution:
    def smallestGoodBase(self, n: str) -> str:
        n = int(n)
        m_max = int(math.log(n, 2))
        
        for m in range(m_max, 1, -1):
            k = int(n**(1/m))
            if (k**(m+1) - 1)  == n*(k-1):
                return str(k)
        return str(n-1)
```

Time complexity: `O(log(n)^2)`
Space complexity: O(1)