---
extends: _layouts.post
section: content
title: Maximum binary string after change
problemUrl: https://leetcode.com/problems/maximum-binary-string-after-change/
date: 2023-01-11
categories: [greedy]
---

We will use greedy approach to solve the problem. We will find the first `0` and change it to `1`. Then we will find the next `0` and change it to `1`. We will repeat this process until we find the last `0`. Finally we will return the binary string.

```python
class Solution:
    def maximumBinaryString(self, binary: str) -> str:
        if '0' not in binary:
            return binary
        n = len(binary)
        k = binary.count('1', binary.find('0'))
        return '1' * (n-k-1) + '0' + '1' * k
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`